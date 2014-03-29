<?hh // strict
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/core/startup/init.php';

abstract class Controller {
  protected function __construct() {
    startup();
  }

  abstract protected function getCSS(): Set<string>;
  abstract protected function getJS(): Set<string>;
  abstract protected function getTitle(): string;
  abstract protected function render(): :xhp;

  final protected function getHead(): :xhp {
    $css = $this->getCSS()->toVector()->map(
      ($css) ==> <link rel="stylesheet" type="text/css" href={$css} />
    );
    $js = $this->getJS()->toVector()->map(
      ($js) ==> <script src={$js} />
    );
    return
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="">
          <meta name="author" content="">
          <title>Hack on octohost</title>
          <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

          <!-- Custom styles for this template -->
          <link href="https://ssl.octohost.io/assets/octohost/jumbotron-narrow.css" rel="stylesheet">
          <link href="https://ssl.octohost.io/assets/octohost/octohost.css" rel="stylesheet">

          <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
        </head>;
  }
}
