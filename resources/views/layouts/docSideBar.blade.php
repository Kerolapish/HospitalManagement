<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="/documentation/Setup" class="brand-link">
    
        <span class="brand-text font-weight-light" style="margin-left: 10px">LibMan Documentation</span>
    </a>
    <div
        class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview"
                            role="menu">
                            <li class="nav-item">
                                <a href="/documentation/getAuthor" class="nav-link {{ (request()->is('documentation/getAuthor')) ? 'active' : '' }}">
                                    <p>Get Author List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/AuthorById" class="nav-link {{ (request()->is('documentation/AuthorById')) ? 'active' : '' }}">
                                    <p>Get Author by ID</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/filterAuthor" class="nav-link {{ (request()->is('documentation/filterAuthor')) ? 'active' : '' }}">
                                    <p>Filtering Author data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/addAuthor" class="nav-link {{ (request()->is('documentation/addAuthor')) ? 'active' : '' }}">
                                    <p>Add Author Entries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/updateAuthor" class="nav-link {{ (request()->is('documentation/updateAuthor')) ? 'active' : '' }}">
                                    <p>Update Author Entries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/deleteAuthor" class="nav-link {{ (request()->is('documentation/deleteAuthor')) ? 'active' : '' }}">
                                    <p>Delete Author Entries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/getBook" class="nav-link {{ (request()->is('documentation/getBook')) ? 'active' : '' }}">
                                    <p>Get Book List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/getBookById" class="nav-link {{ (request()->is('documentation/getBookById')) ? 'active' : '' }}">
                                    <p>Get Book By ID</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/bookFilter" class="nav-link {{ (request()->is('documentation/bookFilter')) ? 'active' : '' }}">
                                    <p>Filtering Book Data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/addBookApi" class="nav-link {{ (request()->is('documentation/addBookApi')) ? 'active' : '' }}">
                                    <p>Add Book Entries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/updateBookApi" class="nav-link {{ (request()->is('documentation/updateBookApi')) ? 'active' : '' }}">
                                    <p>Update Book Entries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/documentation/deleteBookApi" class="nav-link {{ (request()->is('documentation/deleteBookApi')) ? 'active' : '' }}">
                                    <p>Delete Book Entries</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
</aside>
