
<div class="d-flex w-100">
    <a class="nav-link navbar-brand pl-0" href="home.php">Dashboard</a>

    <div class="dropdown mr-auto">
        <a class="dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLinkReports" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Reports</a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkReports">
            <a class="dropdown-item" style="font-weight:bold" href="StreamersFirmwareReport.php">Firmware Report</a>
            <a class="dropdown-item disabled " href="build.php">Inventory report</a>
            <a class="dropdown-item disabled " href="build.php">Non-use report</a>
            <a class="dropdown-item disabled" href="build.php">Customer package adjustment report</a>
            <a class="dropdown-item disabled" href="build.php">Customer usage report</a>
        </div>
    </div>

    <div class="dropdown mr-auto">
        <a class="dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLinkEquipmentSupport" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Equipment support</a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkEquipmentSupport">
            <a class="dropdown-item disabled" href="build.php">Line quality check</a>
            <a class="dropdown-item disabled" href="build.php">Collecting logs</a>
            <a class="dropdown-item disabled" href="build.php">Resetting the equipment</a>
            <a class="dropdown-item " style="font-weight:bold" href="RemoteSupport.php">Remote Support</a>
        </div>
    </div>

    <div class="dropdown mr-auto">
        <a class="dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLinkEquipmentInventoryManagement" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Equipment inventory management</a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkEquipmentInventoryManagement">
            <a class="dropdown-item disabled" href="build.php">Converters in the CRUD system</a>
            <a class="dropdown-item" style="font-weight:bold" href="streamers.php">Return management</a>
            <a class="dropdown-item disabled" href="build.php">Management of equipment under repair</a>
        </div>
    </div>

    <div class="dropdown mr-auto">
        <a class="dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLinkCustomers" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Customers</a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkCustomers">
            <a class="dropdown-item disabled" href="build.php">Establishing a client / administrator user</a>
            <a class="dropdown-item disabled" href="build.php">Update viewing package for the client</a>
            <a class="dropdown-item disabled" href="build.php">Management of client / administrator privileges</a>
            <a class="dropdown-item" style="font-weight:bold" href="accountToStreamer.php">Attach Streamer To Customer</a>
        </div>
    </div>

    <div class="dropdown mr-auto">
        <a class="dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLinkLateralSupportForEquipment" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Lateral support for equipment</a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkCustomers">
            <a class="dropdown-item disabled" href="build.php">Reset admin password</a>
            <a class="dropdown-item" style="font-weight:bold" href="updateStreamersFirmware.php">Distribute FirmWare update</a>
            <a class="dropdown-item disabled" href="build.php">Management of client / administrator privileges</a>
            <a class="dropdown-item disabled" href="build.php">Client link to converter</a>
        </div>
    </div>

    <div class="d-flex">
        <a href="profile.php" class="navbar-brand">Profile</a>
        <a href="logout.php" class="navbar-brand">Log Out</a>
    </div>
</div>
