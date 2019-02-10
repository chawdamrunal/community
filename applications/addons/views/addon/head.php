<?php if (!defined('APPLICATION')) exit();

if (!property_exists($this, 'HideSearch')) {
?>
<div class="SearchForm">
    <?php
    $Filter = ($this->Filter == 'plugins,applications') ? 'apps' : $this->Filter;
    $Url = '/addon/browse/'.$Filter.'/';
    $Query = GetIncomingValue('Keywords', '');
    echo $this->Form->open(array('action' => url($Url.$this->Sort)));
    echo $this->Form->errors();
    echo $this->Form->textBox('Keywords', array('value' => $Query));
    echo $this->Form->button('Browse Addons');

    $Query = urlencode($Query);
    if ($Query != '')
        $Query = '?Keywords='.$Query;
    ?>
    <div class="Options">
        <strong>↳</strong> Filter:
        <?php
        $Suffix = $this->Sort.'/'.$Query;
        echo anchor('Everything', 'addon/browse/all/'.$Suffix, 'ShowAll' . ($this->Filter == 'all' ? ' Active' : ''));
        echo anchor('Plugins', 'addon/browse/apps/'.$Suffix, $this->Filter == 'plugins,applications' ? 'Active' : '');
        echo anchor('Themes', 'addon/browse/themes/'.$Suffix, $this->Filter == 'themes' ? 'Active' : '');
        echo anchor('Locales', 'addon/browse/locales/'.$Suffix, $this->Filter == 'locales' ? 'Active' : '');
        echo anchor('Official', 'addon/browse/core/'.$Suffix, $this->Filter == 'core' ? 'Active' : '');
        ?>
        <strong>↳</strong> Sort:
        <?php
        echo anchor('Last Updated', $Url.'recent/'.$Suffix, $this->Sort == 'recent' ? 'Active' : '');
        echo anchor('Most Downloads', $Url.'popular/'.$Suffix, $this->Sort == 'popular' ? 'Active' : '');
        ?>
    </div>
    <?php
    echo $this->Form->close();
    ?>
</div>
<?php
}