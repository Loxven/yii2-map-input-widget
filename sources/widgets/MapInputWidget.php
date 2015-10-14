<?php

namespace kolyunya\yii2\widgets;

use Yii;

class MapInputWidget extends \yii\widgets\InputWidget
{

    public $key;

    public $latitude = 0;

    public $longitude = 0;

    public $zoom = 0;

    public $width = '100%';

    public $height = '300px';

    public $pattern = '(%latitude%,%longitude%)';

    public $mapType = 'roadmap';

    public $animateMarker = false;

    public $alignMapCenter = true;

    /** @var boolean Display a search box above the map */
    public $showSearchBox = true;

    /** @var string Placeholder for the search box */
    public $searchBoxPlaceholder = "Search place";

    public function run()
    {

        Yii::setAlias('@kolyunya','@vendor/kolyunya');

        // Asset bundle should be configured with the application key
        $this->configureAssetBundle();

        return $this->render(
            'MapInputWidget',
            [
                'id' => $this->getId(),
                'model' => $this->model,
                'attribute' => $this->attribute,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'zoom' => $this->zoom,
                'width' => $this->width,
                'height' => $this->height,
                'pattern' => $this->pattern,
                'mapType' => $this->mapType,
                'animateMarker' => $this->animateMarker,
                'alignMapCenter' => $this->alignMapCenter,
                'showSearchBox' => $this->showSearchBox,
                'searchBoxPlaceholder' => $this->searchBoxPlaceholder,
            ]
        );
    }

    private function configureAssetBundle()
    {
        \kolyunya\yii2\assets\MapInputAsset::$key = $this->key;
        \kolyunya\yii2\assets\MapInputAsset::$showSearchBox = $this->showSearchBox;
    }
}
