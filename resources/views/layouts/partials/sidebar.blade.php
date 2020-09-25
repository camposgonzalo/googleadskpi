<div class="left-sidenav">
        <ul class="metismenu left-sidenav-menu">
            <li>
                <a href="{{route('home')}}"><i class="ti-bar-chart"></i><span>Dashboard</span><span
                        class="menu-arrow"></span></a>

                <a href="{{route('campaign.index')}}"><i class="ti-server"></i><span>Campañas</span><span
                        class="menu-arrow"></span></a>

                <a href="javascript: void(0);"><i class="ti-server"></i><span>Solicitudes</span><span
                        class="menu-arrow"></span></a>

                <a href="javascript: void(0);"><i class="ti-server"></i><span>Facturación</span><span
                        class="menu-arrow"></span></a>


                {{--<ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="analytics-index.html"><i class="ti-control-record"></i>Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crm-index.html"><i class="ti-control-record"></i>CRM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="helpdesk-index.html"><i class="ti-control-record"></i>Helpdesk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Sales</a>
                    </li>
                </ul>--}}
            </li>
            {{--<li>
                <a href="javascript: void(0);"><i class="ti-server"></i><span>Apps</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Email
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/email-read.html">Read
                                    Email</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mannatthemes.com/crovex/crovex_live/apps/chat.html"><i
                                class="ti-control-record"></i>Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mannatthemes.com/crovex/crovex_live/apps/contact-list.html"><i
                                class="ti-control-record"></i>Contact List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mannatthemes.com/crovex/crovex_live/apps/calendar.html"><i
                                class="ti-control-record"></i>Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mannatthemes.com/crovex/crovex_live/apps/invoice.html"><i
                                class="ti-control-record"></i>Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mannatthemes.com/crovex/crovex_live/apps/tasks.html"><i
                                class="ti-control-record"></i>Tasks</a>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Projects
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/apps/project-overview.html">Overview</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/apps/project-projects.html">Projects</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/project-board.html">Board</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/project-teams.html">Teams</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/project-files.html">Files</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/new-project.html">New
                                    Project</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Ecommerce
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/apps/ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/ecommerce-product-list.html">Product
                                    List</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/apps/ecommerce-product-detail.html">Product
                                    Detail</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/apps/ecommerce-cart.html">Cart</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/apps/ecommerce-checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="ti-crown"></i><span>UI Kit</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Elements
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/ui-bootstrap.html">Bootstrap</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/ui-animation.html">Animation</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/ui-avatar.html">Avatar</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/ui-clipboard.html">Clip
                                    Board</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/ui-files.html">File
                                    Manager</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/ui-check-radio.html"><span>Check
                                        & Radio</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Advanced UI
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/advanced-rangeslider.html">Range
                                    Slider</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/advanced-sweetalerts.html">Sweet
                                    Alerts</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/advanced-nestable.html">Nestable
                                    List</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/advanced-ratings.html">Ratings</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/advanced-highlight.html">Highlight</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/advanced-session.html">Session
                                    Timeout</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/advanced-idle-timer.html">Idle
                                    Timer</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Forms
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/forms-elements.html">Basic
                                    Elements</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/forms-advanced.html">Advance
                                    Elements</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/forms-validation.html">Validation</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/forms-wizard.html">Wizard</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/forms-editors.html">Editors</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/forms-repeater.html">Repeater</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/forms-x-editable.html">X
                                    Editable</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/forms-uploads.html">File
                                    Upload</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Charts
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/charts-apex.html">Apex</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/charts-morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/charts-flot.html">Flot</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/charts-chartjs.html">Chartjs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Tables
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/tables-basic.html">Basic</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/tables-datatable.html">Datatables</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/tables-responsive.html">Responsive</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/tables-editable.html">Editable</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Icons
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/icons-materialdesign.html">Material
                                    Design</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/icons-dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/icons-fontawesome.html">Font
                                    awesome</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/icons-themify.html">Themify</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/icons-typicons.html">Typicons</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Maps
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/maps-google.html">Google
                                    Maps</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/maps-vector.html">Vector
                                    Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Email Template
                            <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/email-templates-basic.html">Basic
                                    Action Email</a>
                            </li>
                            <li>
                                <a href="https://mannatthemes.com/crovex/crovex_live/others/email-templates-alert.html">Alert
                                    Email</a>
                            </li>
                            <li>
                                <a
                                    href="https://mannatthemes.com/crovex/crovex_live/others/email-templates-billing.html">Billing
                                    Email</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="ti-layers-alt"></i><span>Pages</span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-profile.html"><i
                                class="ti-control-record"></i>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-timeline.html"><i
                                class="ti-control-record"></i>Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-treeview.html"><i
                                class="ti-control-record"></i>Treeview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-starter.html"><i
                                class="ti-control-record"></i>Starter Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-pricing.html"><i
                                class="ti-control-record"></i>Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/pages/pages-gallery.html"><i
                                class="ti-control-record"></i>Gallery</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="ti-lock"></i><span>Authentication</span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-login.html"><i
                                class="ti-control-record"></i>Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-register.html"><i
                                class="ti-control-record"></i>Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-recover-pw.html"><i
                                class="ti-control-record"></i>Recover Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-lock-screen.html"><i
                                class="ti-control-record"></i>Lock Screen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-404.html"><i
                                class="ti-control-record"></i>Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://mannatthemes.com/crovex/crovex_live/authentication/auth-500.html"><i
                                class="ti-control-record"></i>Error 500</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
