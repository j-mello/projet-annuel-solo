<?php

$inputData = $GLOBALS["_".strtoupper($data["config"]["method"])];

?>

<form method="<?= $data["config"]["method"]?>"
action="<?= $data["config"]["action"]?>"
id="<?= $data["config"]["id"]?>"
class="<?= $data["config"]["class"]?>"
enctype="<?= $data["config"]["enctype"]??"" ?>">

<?php foreach ($data["fields"] as $name => $configField):?>
        <div class="form-group row">
          <div class="col-sm-12">

              <?php if($configField["type"] == "captcha"): ?>
                <input
                value="<?= (isset($inputData[$name]) && $configField["type"]!="password")?$inputData[$name]:'' ?>"
                type="<?= $configField["type"]??'' ?>"
                name="<?= $name??'' ?>"
                placeholder="<?= $configField["placeholder"]??'' ?>"
                class="<?= $configField["class"]??'' ?>"
                id="<?= $configField["id"]??'' ?>"
                <?=(!empty($configField["required"]))?"required='required'":""?> >
                <br>
                  <img src="script/captcha.php" width="300px">
              <?php elseif ($configField["type"] == "select"):?>
                <select 
                name="<?= $name??'' ?>" 
                placeholder="<?= $configField["placeholder"]??'' ?>"
                class="<?= $configField["class"]??'' ?>"
                id="<?= $configField["id"]??'' ?>" >
                <?php foreach ($configField['elements'] as $element):?>
                  <option value="<?= $element['id'] ?>"><?= $element['value'] ?></option>
                <?php endforeach ?>
                </select>
              <?php else: ?>

            <input
                value="<?= (isset($inputData[$name]) && $configField["type"]!="password")?$inputData[$name]:'' ?>"
                type="<?= $configField["type"]??'' ?>"
                name="<?= $name??'' ?>"
                placeholder="<?= $configField["placeholder"]??'' ?>"
                class="<?= $configField["class"]??'' ?>"
                id="<?= $configField["id"]??'' ?>"
                <?=(!empty($configField["required"]))?"required='required'":""?> >
              <?php endif;?>
        </div>
      </div>
      <br>
      <?php endforeach;?>
      <br>
  <button class="btn btn-primary"><?= $data["config"]["submit"];?></button>
</form>
<?php
if (isset($this->data["errors"][$data["config"]["actionName"]])) {
    echo "<ul>";
    foreach ($this->data["errors"][$data["config"]["actionName"]] as $error) {
        echo("<li style='color: red; margin-left: -30px'>".$error."</li>");
    }
    echo "</ul>";
} else if (isset($this->data["success"][$data["config"]["actionName"]])) {
    echo "<font color='green'>".$this->data["success"][$data["config"]["actionName"]]."</font>";
}
?>
