<?php

namespace Kendo\Dataviz\UI;

class ArcGaugeScaleLabels extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The background color of the labels. Any valid CSS color string will work here, including hex and rgb
    * @param string $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function background($value) {
        return $this->setProperty('background', $value);
    }

    /**
    * The border of the labels.
    * @param \Kendo\Dataviz\UI\ArcGaugeScaleLabelsBorder|array $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function border($value) {
        return $this->setProperty('border', $value);
    }

    /**
    * The text color of the labels. Any valid CSS color string will work here, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The font style of the labels.
    * @param string $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function font($value) {
        return $this->setProperty('font', $value);
    }

    /**
    * The format of the labels.
    * @param string $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function format($value) {
        return $this->setProperty('format', $value);
    }

    /**
    * The margin of the labels.
    * @param float|\Kendo\Dataviz\UI\ArcGaugeScaleLabelsMargin|array $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function margin($value) {
        return $this->setProperty('margin', $value);
    }

    /**
    * The padding of the labels.
    * @param float|\Kendo\Dataviz\UI\ArcGaugeScaleLabelsPadding|array $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function padding($value) {
        return $this->setProperty('padding', $value);
    }

    /**
    * Sets the template option of the ArcGaugeScaleLabels.
    * The label template. Template variables: *   value - the value
    * @param string $value The id of the element which represents the kendo template.
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function templateId($value) {
        $value = new \Kendo\Template($value);

        return $this->setProperty('template', $value);
    }

    /**
    * Sets the template option of the ArcGaugeScaleLabels.
    * The label template. Template variables: *   value - the value
    * @param string $value The template content.
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function template($value) {
        return $this->setProperty('template', $value);
    }

    /**
    * The visibility of the labels.
    * @param boolean $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function visible($value) {
        return $this->setProperty('visible', $value);
    }

    /**
    * Sets the labels position
    * @param string $value
    * @return \Kendo\Dataviz\UI\ArcGaugeScaleLabels
    */
    public function position($value) {
        return $this->setProperty('position', $value);
    }

//<< Properties
}

?>
