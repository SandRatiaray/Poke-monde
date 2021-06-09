<?php
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
//Autoload
define("ROOT", dirname(__DIR__));
require_once ROOT.'/vendor/autoload.php';
// Request
$request = Request::createFromGlobals();

// Ajout du routeur
require ROOT.'/config/router.php';

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);
extract($matcher->match($request->getPathInfo()));
$_controller($request);