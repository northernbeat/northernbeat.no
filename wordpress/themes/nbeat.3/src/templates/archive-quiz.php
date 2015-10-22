<?php

$args    = array("post_type"   => "quiz",
                 "post_status" => "publish",
                 "orderby"     => "date",
                 "order"       => "desc",
                 "numberposts" => 1);

$data    = Timber::get_context();
$tmp     = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Quiz");
$total   = 0;
$correct = 0;

if (isset($tmp[0])) {
    $total        = count($tmp[0]->getContent());
    $data["post"] = $tmp[0];
}

if (isset($_REQUEST["submit"])) {
    foreach ($_REQUEST as $key => $val) {

        if ("ans-q" == substr($key, 0, 5)) {
            $id    = substr($key, 4);
            $check = md5($id . "rekti");

            if ($check == $val) {
                ++$correct;
            }
        }
    }

    $data["score"]   = round(($correct / $total) * 100);
    $data["correct"] = $correct;
    $data["total"]   = $total;

    $email = $_REQUEST["email"];
    $phone = $_REQUEST["mobile"];
    
    $to      = "eirik@nbeat.no, orjan@nbeat.no";
    $subject = "Svar på quiz (" . $data["score"] . " %)";
    $msg     = sprintf("Epost: %s\nTelefon: %s\nAntall riktige: %s (av %s)",
                       $email, $phone, $correct, $total);

    mail($to, $subject, $msg);
}

Timber::render("pages/quiz.twig", $data, $timerCacheTime);
