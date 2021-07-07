<?php 
    class Members extends Controller {
        public function __construct()
        {
            $this->MembersModel = $this->model("MembersModel");
        }

        public function index() {
        header('Cache-Control: no cache');
        //seeking members
        if($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL & $_POST['to_age'] != NULL) {
            $data = $this->MembersModel->seekingUsersByGenderAndAge($_POST['seeking_gender'], $_POST['from_age'], $_POST['to_age']);
            if($_POST['seeking_city'] != NULL) {
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["city_id"] != $_POST['seeking_city']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_state'] != NULL) {
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["state_id"] != $_POST['seeking_state']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_country'] != NULL) {
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["country_id"] != $_POST['seeking_country']) {
                        unset($data[$k]);
                    }
                }
            }
        } elseif($_POST['seeking_gender'] != NULL && $_POST['from_age'] != NULL) {
                $data = $this->MembersModel->seekingUsersByGenderAndFromAge($_POST['seeking_gender'], $_POST['from_age']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            } elseif($_POST['seeking_gender'] != NULL && $_POST['to_age'] != NULL) {
                $data = $this->MembersModel->seekingUsersByGenderAndToAge($_POST['seeking_gender'], $_POST['to_age']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            } elseif($_POST['from_age'] != NULL && $_POST['to_age'] != NULL) {
                $data = $this->MembersModel->seekingUsersByAge($_POST['from_age'], $_POST['to_age']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            }
            elseif($_POST['seeking_gender'] != NULL) {
                $data = $this->MembersModel->seekingUsersByGender($_POST['seeking_gender']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            } elseif($_POST['from_age'] != NULL) {
                $data = $this->MembersModel->seekingUsersFromAge($_POST['from_age']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            } elseif($_POST['to_age'] != NULL) {
                $data = $this->MembersModel->seekingUsersToAge($_POST['to_age']);
                if($_POST['seeking_city'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["city_id"] != $_POST['seeking_city']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_state'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["state_id"] != $_POST['seeking_state']) {
                            unset($data[$k]);
                        }
                    }
                } elseif($_POST['seeking_country'] != NULL) {
                    foreach($data as $k => $value) {
                        $address = $this->MembersModel->getCurrentAddress($value["id"]);
                        if($address["country_id"] != $_POST['seeking_country']) {
                            unset($data[$k]);
                        }
                    }
                }
            } elseif($_POST['seeking_city'] != NULL) {
                $data = $this->MembersModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["city_id"] != $_POST['seeking_city']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_state'] != NULL) {
                $data = $this->MembersModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["state_id"] != $_POST['seeking_state']) {
                        unset($data[$k]);
                    }
                }
            } elseif($_POST['seeking_country'] != NULL) {
                $data = $this->MembersModel->getAllUsers();
                foreach($data as $k => $value) {
                    $address = $this->MembersModel->getCurrentAddress($value["id"]);
                    if($address["country_id"] != $_POST['seeking_country']) {
                        unset($data[$k]);
                    }
                }
            } else {
                $data = $this->MembersModel->getAllUsers();
            }

            foreach($data as $k => $value) {
                //remove members that user has already liked
                if($this->MembersModel->isLike($_SESSION["user_id"], $value["id"]) || $_SESSION["user_id"] == $value["id"]) {
                    unset($data[$k]);
                }
            }
        
        
        $data['country'] = $this->MembersModel->fetch_country();
        $this->view('pages/members', $data);
    }

    
    function fetch_state() {
        if(isset($_POST['country_id']))
        {
            echo $this->MembersModel->fetch_state($_POST['country_id']);
        } 
    }
    
    function fetch_city() {
        if(isset($_POST['state_id']))
        {
            echo $this->MembersModel->fetch_city($_POST['state_id']);
        }
    }

    //click like
    function like() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            if(!$this->MembersModel->isLike($user_1, $user_2)) {
                $this->MembersModel->addRelationship($user_1, $user_2);
            }

            if($this->MembersModel->isLike($user_2, $user_1)) {
                $this->MembersModel->updateRelationship($user_2, $user_1, '1');
            }
        }
    }

    //click unlike
    function unlike() {
        if(isset($_POST['like'])) {
            $user_2 = $_POST['user_2'];
            $user_1 = $_SESSION['user_id'];
            $this->MembersModel->removeRelationship($user_1, $user_2);
        }
    }
}