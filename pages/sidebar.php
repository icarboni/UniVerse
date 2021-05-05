<!-- Codice originale: https://www.codeply.com/p/Nkp8O77PFS -->


<div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-lg-3 col-xl-2 px-lg-2 px-0 bg-light d-flex sticky-top ">
            <div class="d-flex flex-lg-column flex-row flex-grow-1 align-items-center align-items-lg-start px-3 pt-2 text-black">
                <a href="/" class="d-flex align-items-center pb-lg-3 mb-lg-0 me-lg-auto text-white text-decoration-none">
                    <!-- <span class="fs-5">B<span class="d-none d-lg-inline">rand</span></span>-->
                    <img src="../images/logo-viola-piccolo.png" alt="" width="150" height="38"  class="d-inline-block align-text-top">

                </a>
                <ul class="nav nav-pills flex-lg-column flex-row flex-nowrap flex-shrink-1 flex-lg-grow-0 flex-grow-1 mb-lg-auto mb-0 justify-content-center align-items-center align-items-lg-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-lg-0 px-2">
                        <i class="bi-house-fill"></i><span class="ms-1 d-none d-lg-inline txt">Bacheca</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link px-lg-0 px-2">
                        <i class="bi-ui-checks"></i><span class="ms-1 d-none d-lg-inline txt">Carriera</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-lg-0 px-2">
                            <i class="bi-clock-fill"></i><span class="ms-1 d-none d-lg-inline txt">Orario</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link px-lg-0 px-2">
                            <i class="bi-calendar-event-fill"></i><span class="ms-1 d-none d-lg-inline txt">Organizzazione (?)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link px-lg-0 px-2">
                            <i class="bi-gear-fill"></i><span class="ms-1 d-none d-lg-inline txt">Impostazioni</span>
                        </a>
                    </li>
                    <!--
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-lg-0 px-1" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-bootstrap"></i><span class="ms-1 d-none d-lg-inline txt">Bootstrap</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
                <div class="dropdown py-lg-4 mt-lg-auto ms-auto ms-lg-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-lg-inline mx-1">Joe</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column h-100">
            <main class="row overflow-scroll">
                <div class="col pt-4">
                <?php include "bacheca.php"; ?>
            </main>
            
        </div>
    </div>
</div>