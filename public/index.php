<?php
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

//Autoload
define("ROOT", dirname(__DIR__));
require_once ROOT.'/vendor/autoload.php';

// Request
$request = Request::createFromGlobals();

// Ajout du routeur
require ROOT.'/config/router.php';

$context = new RequestContext();
$context->fromRequest($request);

// Twig
$loader = new FilesystemLoader(ROOT.'/templates');
$template = new Environment($loader, ['cache' => false]);

$matcher = new UrlMatcher($routes, $context);
extract($matcher->match($request->getPathInfo()));
$_controller($request, $template);