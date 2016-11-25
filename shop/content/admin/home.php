<h1><?=getLangText("welcome")." ".$_SESSION["user"]["firstname"]." ".$_SESSION["user"]["lastname"] ?></h1>

<?=createLink(getLangText("adm_overview"), "admin"); ?><br />
<?=createLink(getLangText("adm_user"), "admin&mode=user"); ?><br />
<?=createLink(getLangText("adm_article"), "admin&mode=article"); ?><br />
<?=createLink(getLangText("adm_manufracturer"), "admin&mode=manufracturer"); ?><br />
<?=createLink(getLangText("adm_category"), "admin&mode=category"); ?><br />
<?=createLink(getLangText("adm_orders"), "admin&mode=orders"); ?>