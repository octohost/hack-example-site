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

trait StandardPage {
  require extends Controller;

  abstract protected function renderMainColumn(): :xhp;

  protected function getExtraCSS(): Set<string> {
    return Set {};
  }

  protected function getExtraJS(): Set<string> {
    return Set {};
  }

  final protected function getCSS(): Set<string> {
    return (Set {
      '/css/base.css',
    })->addAll($this->getExtraCSS());
  }

  final protected function getJS(): Set<string> {
    return (Set {
    })->addAll($this->getExtraJS());
  }

  final private function renderHeader(): :xhp {
    return
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="https://www.octohost.io">About</a></li>
          <li><a href="https://www.octohost.io/">Contact</a></li>
        </ul>
        <h3 class="text-muted">octohost</h3>
      </div>;
  }

  final protected function render(): :xhp {
    return
      <div class="container">
        {$this->renderHeader()}
        {$this->renderMainColumn()}
    </div>;
  }
}
