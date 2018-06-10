<?php
/**
 * Created by PhpStorm.
 * User: wilder8
 * Date: 10/06/18
 * Time: 15:14
 */

class TimeTravel
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    /**
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return DateTime
     */
    public function setStart()
    {
        return $start = $this->start;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return DateTime
     */
    public function setEnd()
    {
        return  $end =$this->end;
    }

    /**
     * TimeTravel constructor.
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo() :string
    {
        $interval = $this->start->diff($this->end);

        $message = 'Il y a '
            . $interval->format('%Y') . ' années, '
            . $interval->format('%m') . ' mois, '
            . $interval->format('%d') . ' jours, '
            . $interval->format('%H') . ' heures, '
            . $interval->format('%i') . ' minutes et '
            . $interval->format('%s') . ' secondes entre les deux dates';

        return $message;
    }

    /**
     * @param DateInterval $interval
     * @return string
     */
    public function findDate( DateInterval  $interval) :string
    {
        $date = $this->start->sub($interval)->format('Y-m-d H:i:s');
        $message = $date;
        return $message;
    }


    /**
     * @param $step
     * @return array
     */
    public function backToFutureStepByStep($step) :array
    {   $interval = new DateInterval($step);
        $periods = new DatePeriod($this->start, $interval, $this->end);
        $dateRanges = [];
        foreach($periods as $date) {
            $dateRanges[] = $date->format('M j Y H:i');
        }

        return $dateRanges;


    }

}