<?php

use yii\helpers\Html;
use yii\helpers\Url;

// Register asset bundle
\kolyunya\yii2\assets\MapInputAsset::register($this);

// [BEGIN] - Map input widget container
echo Html::beginTag(
    'div',
    [
        'class' => 'kolyunya-map-input-widget',
        'style' => "width: $width; height: $height;",
        'id' => $id,
        'data' =>
            [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'zoom' => $zoom,
                'pattern' => $pattern,
                'map-type' => $mapType,
                'animate-marker' => $animateMarker,
                'align-map-center' => $alignMapCenter,
            ],
    ]
);

// The actual hidden input
echo Html::activeHiddenInput(
    $model,
    $attribute,
    [
        'class' => 'kolyunya-map-input-widget-input',
    ]
);

// Search box
    if ($showSearchBox) {
        if(!empty($model) && !empty($form) && !empty($field)){
            echo $form->field($model, $field)->textInput([
                'maxlength' => true,
                'id' => $id.'-pac-input',
                'placeholder' => $searchBoxPlaceholder,
                'class' => 'kolyunya-map-input-search-box'])->label(false);
        } else {
            echo Html::input('text', 'map-search-box', null, [
                'id' => $id.'-pac-input',
                'placeholder' => $searchBoxPlaceholder,
                'class' => 'kolyunya-map-input-search-box']);
        }
    }

// Map canvas
echo Html::tag(
    'div',
    '',
    [
        'class' => 'kolyunya-map-input-widget-canvas',
        'style' => "width: 100%; height: 100%",
    ]
);

// [END] - Map input widget container
echo Html::endTag('div');
