<?php

class TimeTravel
{
    protected $start;
    protected $end;

    public function setStart($year, $month, $day, $hour, $minute, $second){
        $this->start = new DateTime();
        $this->start->setDate($year, $month, $day)->setTime($hour, $minute, $second);
        return $this;
    }

    public function setEnd($year, $month, $day, $hour, $minute, $second){
        $this->end = new DateTime();
        $this->end->setDate($year, $month, $day)->setTime($hour, $minute, $second);
        return $this;
    }

    public function getStart(){
        return $this->start;
    }

    public function getEnd(){
        return $this->end;
    }

    public function getTravelInfo(){
        $diff = date_diff($this->start, $this->end);
        return "Il y a $diff->y années, $diff->m mois, $diff->d jours, $diff->h heures, $diff->m minutes et $diff->s secondes entre les deux dates";
    }

    public function findDate(){
        $start = $this->getStart();
        $interval = new DateInterval("PT1000000000S");
        $result = $start;
        return  $result->sub($interval);
    }

    public function backToTheFutureStepByStep(){
        $interval = new DateInterval("P38D");
        $start = $this->getStart();
        $end = $this->getEnd();
        $dateRange = new DatePeriod($start, $interval, $end);
        $timeArray = [];
        foreach($dateRange as $date){
            $arrayDate = $date->format("M d Y A H:i:s");
            array_push($timeArray, $arrayDate);
        }
        var_dump($timeArray);
    }

}

