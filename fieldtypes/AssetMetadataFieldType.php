<?php
namespace Craft;

class AssetMetadataFieldType extends BaseFieldType
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the component's name.
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Asset Metadata');
    }

    /**
     * Returns the field's content attribute config.
     *
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return [AttributeType::Mixed, 'column' => ColumnType::Text];
    }

    /**
     * Returns the component's settings HTML.
     *
     * @return string|null
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('assetmetadata/fieldtypes/assetmetadata/settings', [
            'settings' => $this->getSettings(),
        ]);
    }

    /**
     * Returns the field's input HTML.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return string
     */
    public function getInputHtml($name, $values)
    {
        return craft()->templates->render('assetmetadata/fieldtypes/assetmetadata/input', [
            'id'        => craft()->templates->formatInputId($name),
            'name'      => $name,
            'values'    => $values,
            'settings'  => $this->getSettings(),

            'fieldId'   => $this->model->id,
            'elementId' => $this->element->id,
        ]);
    }

    /**
     * Prepares the field's value for use.
     *
     * @param mixed $values
     *
     * @return mixed
     */
    public function prepValue($values)
    {
        if (is_array($values) && ($subfields = $this->getSettings()->subfields)) {
            // Make subfields available via their handles
            foreach ($values as $id => $value) {
                if (isset($subfields[$id])) {
                    $values[$subfields[$id]['handle']] = $value;
                }
            }

            return $values;
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Defines the settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
        return [
            'subfields'            => [AttributeType::Mixed, 'default' => [['name' => '', 'handle' => '', 'defaultValue' => '']]],
            'useCustomMetadataVar' => [AttributeType::Bool, 'default' => false],
            'customMetadataVar'    => [AttributeType::String, 'default' => ''],
            'readonly'             => [AttributeType::Bool, 'default' => false],
            'showRefreshButton'    => [AttributeType::Bool, 'default' => false],
            'refreshOnElementSave' => [AttributeType::Bool, 'default' => false],
        ];
    }
}
