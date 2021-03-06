<?php

/**
 * Daemon which is very busy every other minute. This will cause it to
 * autoscale up and down.
 *
 */
final class PhutilHighIntensityIntervalDaemon extends PhutilTortureTestDaemon {

  protected function run() {
    while (!$this->shouldExit()) {
      $m = (int)date('i');
      if ($m % 2) {
        $this->willBeginWork();
        $this->log('Busy.');
      } else {
        $this->willBeginIdle();
        $this->log('Idle.');
      }
      $this->sleep(1);
    }
  }

}
