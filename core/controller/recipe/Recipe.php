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

require_once $_SERVER['DOCUMENT_ROOT'].'/core/controller/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/core/controller/standard-page/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/core/myxhp/init.php';

abstract class Recipe extends GetController {
  use StandardPage;

  abstract protected function getName(): string;
  abstract protected function getFilenames(): Vector<string>;
  abstract protected function getDocs(): Vector<(string, string)>;

  protected function getDescription(): ?string {
    return null;
  }

  final protected function getTitle(): string {
    return $this->getName().' - Hack Cookbook';
  }

  final protected function renderMainColumn(): :xhp {
    $main_column =
      <div class="jumbotron">
        <a href="https://www.octohost.io"><img src="https://ssl.octohost.io/assets/octohost/octohost-300-words.png" class="img-responsive" width="200" height="200" align="right" /></a>
        <h1>Ramaze</h1>

        <p class="lead"><a href="http://hacklang.org/" title="Hack">Hack</a> running on <a href="https://www.octohost.io">octohost</a>.</p>
        <p><a class="btn btn-lg btn-success" href="https://www.octohost.io" role="button">Use it Free</a></p>
      </div>;
    $marketing =
      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Simple</h4>
          <p>Add a <a href="http://docs.docker.io/en/latest/use/builder/" title="Dockerfiles for Images - Docker Documentation">Dockerfile</a> to your app's repository. Then git push to the octohost server. <a href="https://github.com/octohost">Examples here.</a></p>

          <h4>Flexible</h4>
          <p><a href="https://www.octohost.io/languages.html">Don't see a language you use?</a> They're really easy to add.</p>

          <h4>Extendible</h4>
          <p><a href="https://github.com/octohost/octohost/issues">We're just getting started</a>.</p>
        </div>

        <div class="col-lg-6">
          <h4>Based on <a href="http://www.docker.io/" title="Homepage - Docker: the Linux container engine">Docker</a></h4>
          <p>An open source project to pack, ship and run any application as a lightweight container.</p>

          <h4>Works like <a href="https://www.heroku.com/">Heroku</a></h4>
          <p>Very simple baby PaaS - git push to deploy your websites as needed.</p>

          <h4>Open Source</h4>
          <p><a href="https://www.octohost.io">Available</a> to try, use, deploy, extend at no cost.</p>
        </div>
      </div>;
      $main_column->appendChild($marketing);
      $footer =
        <div class="footer">
        <div style="float:left;">&copy; <a href="http://www.nonfiction.ca/" title="nonfiction studios - Home">nonfiction</a> 2014</div><div style="float:right;"><a href="https://twitter.com/octohost" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @octohost</a></div>
        </div>

        </div> <!-- /container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <script src="https://ssl.octohost.io/assets/octohost/ga.js"></script>;
      $main_column->appendChild($footer);
    return $main_column;
  }
}
