<?php

namespace Kendo\UI;

class TaskBoardResource extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The field of the resource data item which contains the resource color.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function dataColorField($value) {
        return $this->setProperty('dataColorField', $value);
    }

    /**
    * Sets the data source of the TaskBoardResource.
    * @param array|\Kendo\Data\DataSource $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function dataSource($value) {
        return $this->setProperty('dataSource', $value);
    }

    /**
    * The field of the resource data item which represents the resource text.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function dataTextField($value) {
        return $this->setProperty('dataTextField', $value);
    }

    /**
    * The field of the resource data item which represents the resource value. The resource value is used to link a TaskBoard event with a resource.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function dataValueField($value) {
        return $this->setProperty('dataValueField', $value);
    }

    /**
    * The field of the TaskBoard event which contains the resource id.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function field($value) {
        return $this->setProperty('field', $value);
    }

    /**
    * If set to true the TaskBoard event can be assigned multiple instances of the resource. The TaskBoard event field specified via the field option will contain an array of resources. By default only one resource instance can be assigned to an event.
    * @param boolean $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function multiple($value) {
        return $this->setProperty('multiple', $value);
    }

    /**
    * The name of the resource used to distinguish resource. If not set the value of the field option is used.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function name($value) {
        return $this->setProperty('name', $value);
    }

    /**
    * The user friendly title of the resource displayed in the TaskBoard edit form. If not set the value of the field option is used.
    * @param string $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function title($value) {
        return $this->setProperty('title', $value);
    }

    /**
    * Set to false if the TaskBoard event field specified via the field option contains a resource data item. By default the TaskBoard expects that field to contain a primitive value (string, number) which corresponds to the "value" of the resource (specified via dataValueField).
    * @param boolean $value
    * @return \Kendo\UI\TaskBoardResource
    */
    public function valuePrimitive($value) {
        return $this->setProperty('valuePrimitive', $value);
    }

//<< Properties
}

?>
