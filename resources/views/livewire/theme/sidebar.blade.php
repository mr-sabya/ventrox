<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <livewire:auth.logout />
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- MAIN MENU</li>
                <li class="{{ Route::is('home') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}" wire:navigate aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('permission.index') || Route::is('role.index') ? 'active' : '' }}">
                    <a class="has-arrow waves-effect waves-dark {{ Route::is('permission.index') || Route::is('role.index') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="icon-envelope-open"></i><span class="hide-menu">Role & Permission</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="{{ Route::is('permission.index') ? 'active' : '' }}">
                            <a href="{{ route('permission.index') }}" class="{{ Route::is('permission.index') ? 'active' : '' }}" wire:navigate>Permissions</a>
                        </li>
                        <li class="{{ Route::is('role.index') ? 'active' : '' }}">
                            <a href="{{ route('role.index') }}" class="{{ Route::is('role.index') ? 'active' : '' }}" wire:navigate>Roles</a>
                        </li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PROFESSIONAL</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Leads</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="crm-leads.html">All Leads</a></li>
                        <li><a href="crm-add-leads.html">Add Leads</a></li>
                        <li><a href="crm-edit-leads.html">Edit Leads</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-docs"></i><span class="hide-menu">Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="crm-customer-report.html">Customer Reports</a></li>
                        <li><a href="crm-leads-report.html">Leads Reports</a></li>
                        <li><a href="crm-sales-report.html">Sales Reports</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Customers</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="crm-customers.html">All Customers</a></li>
                        <li><a href="crm-add-customers.html">Add Customers</a></li>
                        <li><a href="crm-edit-customers.html">Edit Customers</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-handbag"></i><span class="hide-menu">Vendors</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="crm-vendors.html">All Vendors</a></li>
                        <li><a href="crm-add-vendors.html">Add Vendors</a></li>
                        <li><a href="crm-edit-vendors.html">Edit Vendors</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-receipt"></i><span class="hide-menu">Invoice</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="crm-add-invoice.html">Add Invoice</a></li>
                        <li><a href="crm-edit-invoice.html">Edit Invoice</a></li>
                        <li><a href="crm-view-invoice.html">View Invoice</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Widgets</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="widget-data.html">Data Widgets</a></li>
                        <li><a href="widget-apps.html">Apps Widgets</a></li>
                        <li><a href="widget-charts.html">Charts Widgets</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-light-bulb"></i><span class="hide-menu">Icons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-iconmind.html">Mind Icons</a></li>
                        <li><a href="icon-simple-lineicon.html">Simple Line icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- EXTRA COMPONENTS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-equalizer"></i><span class="hide-menu">Ui Elements <span class="badge rounded-pill bg-primary text-white ms-auto">25</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-user-card.html">User Cards</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-tab.html">Tab</a></li>
                        <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                        <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                        <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="ui-notification.html">Notification</a></li>
                        <li><a href="ui-progressbar.html">Progressbar</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-range-slider.html">Range slider</a></li>
                        <li><a href="ui-timeline.html">Timeline</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                        <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                        <li><a href="ui-list-media.html">List Media</a></li>
                        <li><a href="ui-ribbons.html">Ribbons</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                        <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                        <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                        <li><a href="ui-spinner.html">Spinner</a></li>
                        <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                        <li><a href="ui-toasts.html">Toasts</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Sample Pages <span class="badge rounded-pill bg-info">25</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Starter Kit</a></li>
                        <li><a href="pages-blank.html">Blank page</a></li>
                        <li><a href="javascript:void(0)" class="has-arrow">Authentication <span class="badge rounded-pill bg-success pull-right">6</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-login.html">Login 1</a></li>
                                <li><a href="pages-login-2.html">Login 2</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-register2.html">Register 2</a></li>
                                <li><a href="pages-register3.html">Register 3</a></li>
                                <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                <li><a href="pages-recover-password.html">Recover password</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-profile.html">Profile page</a></li>
                        <li><a href="pages-animation.html">Animation</a></li>
                        <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                        <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-treeview.html">Treeview</a></li>
                        <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                        <li><a href="pages-search-result.html">Search result</a></li>
                        <li><a href="pages-scroll.html">Scrollbar</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-faq.html">Faqs</a></li>
                        <li><a href="javascript:void(0)" class="has-arrow">Error Pages</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-error-400.html">400</a></li>
                                <li><a href="pages-error-403.html">403</a></li>
                                <li><a href="pages-error-404.html">404</a></li>
                                <li><a href="pages-error-500.html">500</a></li>
                                <li><a href="pages-error-503.html">503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Forms</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-basic.html">Basic Forms</a></li>
                        <li><a href="form-layout.html">Form Layouts</a></li>
                        <li><a href="form-addons.html">Form Addons</a></li>
                        <li><a href="form-material.html">Form Material</a></li>
                        <li><a href="form-float-input.html">Floating Lable</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="form-upload.html">File Upload</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-bootstrap-validation.html">Form Bootstrap Validation</a></li>
                        <li><a href="form-dropzone.html">File Dropzone</a></li>
                        <li><a href="form-icheck.html">Icheck control</a></li>
                        <li><a href="form-img-cropper.html">Image Cropper</a></li>
                        <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                        <li><a href="form-typehead.html">Form Typehead</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                        <li><a href="form-summernote.html">Summernote Editor</a></li>
                        <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Tables</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="table-basic.html">Basic Tables</a></li>
                        <li><a href="table-layout.html">Table Layouts</a></li>
                        <li><a href="table-data-table.html">Data Tables</a></li>
                        <li><a href="table-footable.html">Footable</a></li>
                        <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                        <li><a href="table-responsive.html">Responsive Table</a></li>
                        <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                        <li><a href="table-editable-table.html">Editable Table</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- SUPPORTS</li>
                <li>
                    <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false">
                        <i class="icon-logout"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-layers"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>