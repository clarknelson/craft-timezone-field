<?php

namespace clarknelson\crafttimezonefield;

use Craft;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use clarknelson\crafttimezonefield\models\TimeZoneField;
use craft\services\Fields;
use yii\base\Event;

/**
 * Timezone Field plugin
 *
 * @method static Plugin getInstance()
 * @author Clark Nelson <email@clarknelson.com>
 * @copyright Clark Nelson
 * @license https://craftcms.github.io/license/ Craft License
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TimeZoneField::class;
            }
        );
    }
}
