<?php

namespace Kendo\UI;

class SchedulerMessagesRecurrenceEditorYearly extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The text similar to "day" displayed in the scheduler recurrence editor. Also used for titles of the appropriate inputs.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function day($value) {
        return $this->setProperty('day', $value);
    }

    /**
    * The text similar to "month" displayed in the scheduler recurrence editor. Also used for titles of the appropriate inputs.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function month($value) {
        return $this->setProperty('month', $value);
    }

    /**
    * The text similar to " of " displayed in the scheduler recurrence editor.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function of($value) {
        return $this->setProperty('of', $value);
    }

    /**
    * The text similar to "Repeat every: " displayed in the scheduler recurrence editor.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function repeatEvery($value) {
        return $this->setProperty('repeatEvery', $value);
    }

    /**
    * The text similar to "Repeat on: " displayed in the scheduler recurrence editor.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function repeatOn($value) {
        return $this->setProperty('repeatOn', $value);
    }

    /**
    * The text similar to " year(s)" displayed in the scheduler recurrence editor.
    * @param string $value
    * @return \Kendo\UI\SchedulerMessagesRecurrenceEditorYearly
    */
    public function interval($value) {
        return $this->setProperty('interval', $value);
    }

//<< Properties
}

?>
