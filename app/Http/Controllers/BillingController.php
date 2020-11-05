<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleAdsReport;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\Campaign;

class BillingController extends Controller
{
    //
    public function index()
    {
        return view('billings.index');
    }

    public function details($id)
    {
        return view('billings.details', compact('id'));
    }

    public function store(BillRequest $request)
    {
        $id = $request->input('id');
        $record = Bill::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'message' => ($id) ? 'Cargo editado con éxito' : 'Cargo registrado con éxito',
        ];
    }

    public function recordsGroupByUser()
    {
        $records = Bill::with('campaign', "user")->get()->groupBy('user_id');
        // return $records;
        return [
            'bills' => $records,
            'costs' => $this->recordsMonthsByUser(null),
        ];
    }

    public function recordsByUser($id)
    {
        $records = Bill::whereUser_id($id)->with('campaign', 'user')->get();
        // return $records;
        return [
            'bills' => $records,
            'costs' => $this->recordsMonthsByUser($id),
        ];
    }

    public function recordsPeriodByUser($id, $period)
    {
        $year = substr($period, 0, -2);
        $month = substr($period, -2);
        $records = Bill::whereUser_id($id)->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)->with('campaign', 'user')->get();
        // return $records;
        return [
            'bills' => $records,
            'costs' => $this->recordsMonthByUser($id, $period),
        ];
    }

    public function recordsMonthsByUser($id)
    {
        $today = explode("-", date("Y-m-d"));
        $stack = [];
        if ($id != null) {
            $records = Campaign::whereUser_id($id)->whereNotNull("campaign_id")->with('user')->get();
        } else {
            $records = Campaign::whereNotNull("campaign_id")->with('user')->get();
        }

        foreach ($records as $r) {
            $campaignReport = GoogleAdsReport::getCampaignPerformance($r->campaign_id);
            $initDate = explode("-", $campaignReport["@attributes"]["startDate"]);
            $currentDate = $initDate[0] * 100 + $initDate[1];
            do {
                $campaignReportPerPeriod = GoogleAdsReport::getCampaignPerformancePerPeriod($r->campaign_id, $currentDate . "01", $currentDate . cal_days_in_month(CAL_GREGORIAN, $initDate[1], $initDate[0]));
                $record =
                    [
                    // 'campaign_id' => $r->id,
                    'periodo' => $initDate[0] . "-" . $initDate[1],
                    'cost' => $campaignReportPerPeriod["@attributes"]["cost"],
                    'user' => $r->user,
                ]
                ;
                array_push($stack, $record);
                $initDate[1]++;
                if ($initDate[1] == 13) {
                    $initDate[0]++;
                    $initDate[1] = 1;
                }
                $currentDate = $initDate[0] * 100 + $initDate[1];
            } while ($currentDate <= $today[0] * 100 + $today[1]);
        }
        return $stack;
    }

    public function recordsMonthByUser($id, $period)
    {
        $year = substr($period, 0, -2);
        $month = substr($period, -2);
        $stack = [];
        $records = Campaign::whereUser_id($id)->whereNotNull("campaign_id")->with('user')->get();

        foreach ($records as $r) {
            $campaignReportPerPeriod = GoogleAdsReport::getCampaignPerformancePerPeriod($r->campaign_id, $period . "01", $period . cal_days_in_month(CAL_GREGORIAN, $month, $year));
            $startDate = explode("-", $campaignReportPerPeriod["@attributes"]["startDate"]);
            if ($period - ($startDate[0] * 100 + $startDate[1]) >= 0) {
                $record =
                    [
                    'campaign' => $r,
                    'periodo' => $period,
                    'cost' => $campaignReportPerPeriod["@attributes"]["cost"],
                ];
                array_push($stack, $record);
            }
        }
        return $stack;
    }
}
