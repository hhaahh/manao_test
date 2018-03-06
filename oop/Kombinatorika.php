<?php
namespace kombinatorika;

class Kombinatorika {

    public function combCount($razmerMnoj, $razmerPodmnoj) {
        $res = factorial($razmerMnoj)/factorial($razmerMnoj-$razmerPodmnoj);
        return $res;
    }

    private function factorial($value) {
        if ($value == 0) {
            return 1;
        } else {
            return $value * fac($value - 1);
        }
    }

}
