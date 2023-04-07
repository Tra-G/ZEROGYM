<?php

// load the functions
require_once(__DIR__ . "/../models/functions.php");


class homeController {

    // home page
    public function index() {
        $title = pageTitle("Home");
        $errors = [];
        $result = null;

        // set API key (https://api-ninjas.com/api/exercises)
        define("EXERCISE_API_KEY", "l4mXV/VQfy+H62LCm8taRA==nrLdgsdyQbtCrVcS");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $muscle = $_POST["muscle"];
            $difficulty = $_POST["difficulty"];

            $valid_muscles = array("abdominals", "abductors", "adductors", "biceps", "calves", "chest", "forearms", "glutes", "hamstrings", "lats", "lower_back", "middle_back", "neck", "quadriceps", "traps", "triceps");
            $valid_difficulties = array("beginner", "intermediate", "expert");

            if (!in_array($muscle, $valid_muscles)) {
                $errors[] = "Invalid muscle group";
            } elseif (!in_array($difficulty, $valid_difficulties)) {
                $errors[] = "Invalid difficulty level";
            } else {
                // Send API requests
                $api_url = 'https://api.api-ninjas.com/v1/exercises?muscle='.$muscle.'&difficulty='.$difficulty;
                $headers = array(
                    'X-Api-Key: '.EXERCISE_API_KEY,
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if ($http_status == 200) {
                    // check if response is empty
                    $count = json_decode($response, true);
                    if (count($count) < 1){
                        $errors[] = "No exercise was found";
                        $result = null;
                    }
                    else {
                        $result = $count;
                    }
                }
                else {
                    $errors[] = "No exercise was found";
                }

                curl_close($ch);
            }
        }

        return array(
            'title' => $title,
            'errors' => $errors,
            'result' => $result,
        );
    }

    // about page
    public function about() {
        $title = pageTitle("About");
        return array('title' => $title);
    }

    // contact page
    public function contact() {
        $title = pageTitle("Contact Us");
        return array('title' => $title);
    }
}

?>