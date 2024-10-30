<?php

namespace IsibiaDashboardMessages\Models;

use DateTime;
use Exception;

class DashboardMessagePostValidator
{
    /**
     * @throws Exception
     */
    public function __construct(array $data)
    {
        if (empty($data['form']) || !is_array($data['form'])) {
            throw new Exception(__('No data to save.', 'isibia-dashboard-messages'));
        }

        foreach ($data['form'] as $item) {
            $name = $item['name'];
            $value = $item['value'];
            $this->$name = $value;
        }
    }

    public function validateDate($date, $format = 'Y-m-d'): bool
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    
    /**
     * @throws Exception
     */
    public function validate() : DashboardMessagePostValidator
    {
        if (!isset($this->title) || empty($this->title)) {
            throw new Exception(__('Message title required.', 'isibia-dashboard-messages'));
        }
        if (!empty($this->start_date) && !$this->validateDate($this->start_date)) {
            throw new Exception(__('No valid date format.', 'isibia-dashboard-messages'));
        }
        if (!empty($this->end_date) && !$this->validateDate($this->end_date)) {
            throw new Exception(__('No valid date format.', 'isibia-dashboard-messages'));
        }
        if (!isset($this->content) || empty($this->content)) {
            throw new Exception(__('Empty content.', 'isibia-dashboard-messages'));
        }
        if (isset($this->closed) && (int)$this->closed !== 1) {
            throw new Exception(__('No valid data.', 'isibia-dashboard-messages'));
        }
        
        return $this;
    }
}