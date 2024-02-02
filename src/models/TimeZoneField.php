<?php

namespace clarknelson\crafttimezonefield\models;

use Craft;
use craft\base\Field;
use craft\helpers\Template;

class TimeZoneField extends Field
{
    // Include any properties your field might need

    public static function displayName(): string
    {
        return Craft::t('app', 'Timezone');
    }

    public function getInputHtml(mixed $value, ?craft\base\ElementInterface $element = null): string
    {
        // Generate the dropdown HTML
        $timezones = \DateTimeZone::listIdentifiers();
        $options = array_map(function ($tz) {
            return ['label' => $tz, 'value' => $tz];
        }, $timezones);

        return Craft::$app->getView()->renderTemplate('timezone-field/_components/fields/TimeZoneField_input', [
            'name' => $this->handle,
            'value' => $value,
            'options' => $options,
        ]);
    }
}
