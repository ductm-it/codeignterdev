<?php

namespace Kendo\Dataviz\UI;

class ChartLegendTitlePadding extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The bottom padding of the title.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartLegendTitlePadding
    */
    public function bottom($value) {
        return $this->setProperty('bottom', $value);
    }

    /**
    * The left padding of the title.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartLegendTitlePadding
    */
    public function left($value) {
        return $this->setProperty('left', $value);
    }

    /**
    * The right padding of the title.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartLegendTitlePadding
    */
    public function right($value) {
        return $this->setProperty('right', $value);
    }

    /**
    * The top padding of the title.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartLegendTitlePadding
    */
    public function top($value) {
        return $this->setProperty('top', $value);
    }

//<< Properties
}

?>
