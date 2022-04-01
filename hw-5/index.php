<?php 

/**
 * Hillel home work #5
 */


declare(strict_types=1);

require_once './errors.php';


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
     * 
     * @param RGBColors $colorsToCompare
     * @return boolean
     */
    public function isEquals(RGBColors $colorsToCompare): bool
    {
        return $this->getRedColor() === $colorsToCompare->getRedColor() && 
            $this->getGreenColor() === $colorsToCompare->getGreenColor() &&
            $this->getBlueColor() === $colorsToCompare->getBlueColor();    
    }

    /**
     * Mix two colors and get the third
     * 
     * @param RGBColors $colorToMix
     * @return RGBColors
     */
    public function mix(RGBColors $colorToMix): RGBColors
    {
        return new RGBColors(
            $this->getMixedChannels($this->getRedColor(), $colorToMix->getRedColor()),
            $this->getMixedChannels($this->getGreenColor(), $colorToMix->getGreenColor()),
            $this->getMixedChannels($this->getBlueColor(), $colorToMix->getBlueColor())
        );
    }

    /**
     * Mixed two channels of rgb
     *
     * @param integer $colorChannelBase
     * @param integer $colorChannelWhichAdded
     * @return integer
     */
    private function getMixedChannels(int $colorChannelBase, int $colorChannelWhichAdded): int
    {
        return intval(round(($colorChannelBase + $colorChannelWhichAdded) / 2));
    }


    /*
    * Setters
    */

    private function setRedColor(int $redColor): void
    {
        if ($redColor < 0 || $redColor > 255) {
            throw new Exception('The given parameter should be an integer from 0 to 255');
        }

        $this->red = $redColor;
    }

    private function setGreenColor(int $greenColor): void
    {
        if ($greenColor < 0 || $greenColor > 255) {
            throw new Exception('The given parameter should be an integer from 0 to 255');
        }

        $this->green = $greenColor;
    }

    private function setBlueColor(int $blueColor): void
    {
        if ($blueColor < 0 || $blueColor > 255) {
            throw new Exception('The given parameter should be an integer from 0 to 255');
        }
        
        $this->blue = $blueColor;
    }


    /*
    * Getters
    */

    public function getRedColor(): int
    {
        return $this->red;
    }

    public function getGreenColor(): int
    {
        return $this->green;
    }

    public function getBlueColor(): int
    {
        return $this->blue;
    }

}

echo '<pre>';

$colorOne = new RGBColors(256, 200, 200);
$colorTwo = $colorOne->mix(new RGBColors(100, 100, 100));

print_r($colorTwo);

if ($colorOne->isEquals($colorTwo)) {
    echo 'color is equal' . '<br>';
} else {
    echo 'not equal' . '<br>';
}

echo '</pre>';