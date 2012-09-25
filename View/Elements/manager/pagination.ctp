<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Página {:page} de {:pages}, exibindo {:current} em um total de {:count}, começando em {:start}, terminando em {:end}')
));
?>
</p>