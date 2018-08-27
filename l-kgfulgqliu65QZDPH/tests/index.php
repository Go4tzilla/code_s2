<?php
    if(isset($_GET['page']))
        switch($_GET['page']):
                case 'Register';
                    include './Controllers/register.php';
                    break;
                case 'Login';
                    include './Controllers/login.php';
                    break;
                case 'Logout';
                    include './Controllers/logout.php';
                    break;
                case 'Lobby';    
                    include './Controllers/lobby.php';   
                    break;
                case 'Patients':
                        include './Controllers/patients.php';
                        break;
                case 'Add_collab':
                        include './Controllers/collaborators.php';
                    break;
                case 'Messages':
                        include './Controllers/messages.php';
                    break;
                case 'Rest':
                        include './Controllers/work_days.php';
                    break;
                case 'Appointments':
                        include './Controllers/appointments.php';
                    break;
                case 'Settings';
                        include './Controllers/settings.php';
                    break;
                case 'Search';
                    include './Controllers/search.php';
                    break;
                default:
                include './Controllers/Lobby.php';
                
            endswitch;
        else {
            include './error/404/404.php';
    }
?>
                
