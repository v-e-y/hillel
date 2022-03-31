<?php declare(strict_types=1);

// for dev
require_once './errors.php';

echo 'Hi' . '<br>' . '<pre>';


/**
 * RGBColors
 */
class RGBColors
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRedColor($red);
        $this->setGreenColor($green);
        $this->setBlueColor($blue);
    }

    /**
     * Compares two colors for identity.
     * @param RGBColors $colorsToCompare
     * @return boolean
     */
    public function isEquals(RGBColors $colorsToCompare) :bool
    {
        if (($this->getRedColor() === $colorsToCompare->getRedColor()) && 
            ($this->getGreenColor() === $colorsToCompare->getGreenColor()) &&
            ($this->getBlueColor() === $colorsToCompare->getBlueColor())) {
                return true;
        }
        return false;
    }

    /**
     * Mix two colors and get the third
     * @param RGBColors $colorToMix
     * @return RGBColors
     */
    public function mix(RGBColors $colorToMix) :RGBColors
    {
        function getMixedChannels(int $colorChannelBase, int $colorChannelWhichAdded) :int
        {
            return intval(round(($colorChannelBase + $colorChannelWhichAdded) / 2));
        }

        return new RGBColors(
            getMixedChannels($this->getRedColor(), $colorToMix->getRedColor()),
            getMixedChannels($this->getGreenColor(), $colorToMix->getGreenColor()),
            getMixedChannels($this->getBlueColor(), $colorToMix->getBlueColor())
        );
    }

    /*
    * Setters
    */
    // TODO Exceptions won't work. How they should work if I declared types everywhere?
    private function setRedColor(int $redColor) :void
    {
        $this->red = ($redColor >= 0 && $redColor <= 255) ? $redColor : new Exception('The given parameter should be an integer from 0 to 255');
    }

    private function setGreenColor(int $greenColor) :void
    {
        $this->green = ($greenColor >= 0 && $greenColor <= 255) ? $greenColor : new Exception('The given parameter should be an integer from 0 to 255');
    }

    private function setBlueColor(int $blueColor) :void
    {
        $this->blue = ($blueColor >= 0 && $blueColor <= 255) ? $blueColor : new Exception('The given parameter should be an integer from 0 to 255');
    }

    /*
    * Getters
    */
    public function getRedColor() :int
    {
        return $this->red;
    }

    public function getGreenColor() :int
    {
        return $this->green;
    }

    public function getBlueColor() :int
    {
        return $this->blue;
    }

}


$colorOne = new RGBColors(5, 10, 25);

$colorTwo = $colorOne->mix(new RGBColors(255, 255, 255));

print_r($colorTwo);


if ($colorOne->isEquals($colorTwo)) {
    echo 'color is equal' . '<br>';
} else {
    echo 'not equal' . '<br>';
}

/*
echo $colorOne->getRedColor() . '<br>';
echo $colorOne->getGreenColor() . '<br>';
echo $colorOne->getBlueColor();
*/