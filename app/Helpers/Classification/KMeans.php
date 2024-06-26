<?php

namespace App\Helpers\Classification;

use App\Helpers\Math\Distance;
use App\Helpers\Math\Distance\Euclidean;

class KMeans {
    /**
     * @var int
    */
    private $k;

    /**
     * @var Distance
    */
    private $distanceMetric;

    /**
     * @var array
    */
    private $samples;

    /**
     * @var array
    */
    private $cluster;


    /**
     * @var array
    */
    private $randomSamples;


    /**
     * @var array
    */
    private $countSamples;

    /**
     * @param Distance|null $distanceMetric (if null then Euclidean distance as default)
    */
    public function __construct(int $k = 3, ?Distance $distanceMetric = null, $samples) {
          if($distanceMetric === null) {
            $distanceMetric = new Euclidean();
          }
          $this->k = $k;
          $this->samples = $samples;
          $this->distanceMetric = $distanceMetric;
          $this->cluster = [];
          $this->randomSamples = [];
          $this->countSamples = [];
    }

    // private function assignCluster() {
    //     foreach ($this->countSamples as $current) {
    //         $minDistance = PHP_INT_MAX;
    //         $assignedCluster = null;
    //         foreach ($this->randomSamples as $clusterIndex => $centroid) {
    //             $distance = $this->calculateDistance($current, $centroid);
    //             if ($distance < $minDistance) {
    //                 $minDistance = $distance;
    //                 $assignedCluster = $clusterIndex;
    //             }
    //         }
    //         $this->cluster[$assignedCluster][] = $current;
    //     }
    // }

    private function calculateDistance($point1, $point2) {
        $sqrtValue = 0.0;
        foreach ($point1 as $c => $val) {
            $val = (($point1[$c] - $point2[$c])) ** 2;
            $sqrtValue += $val;
        }
        return sqrt((float)$sqrtValue);
    }

    public function KmeansDistances() {

        // Initialize random samples and clusters
        $randomIndexes = array_rand($this->samples, $this->k);
        $intCluster = 0;
        foreach ($randomIndexes as $index) {
            $this->randomSamples[] = $this->samples[$index];
            $this->cluster[$intCluster][] = $this->samples[$index];
            $intCluster++;
        }
        // echo 'kluster awal:'.print_r($this->cluster)."<br><br>";
        // echo 'sampel awal:'.print_r( $this->randomSamples)."<br><br>";

        // Determine count samples
        foreach ($this->samples as $sample) {
            if (!in_array($sample, $this->randomSamples)) {
                $this->countSamples[] = $sample;
            }
        }
        // echo 'yang akan dihitung:'.print_r($this->countSamples)."<br><br>";

        $this->assignCluster();

        // echo 'kluster akhir:'.print_r($this->cluster)."<br><br>";

        return $this->cluster;
    }

    private function assignCluster() {
        foreach ($this->countSamples as $i => $current) {
            $minValue=[];
            // echo 'countSamples'.print_r($current).'<br>';
            foreach ($this->randomSamples as $j => $neighbor) {
                // echo 'randomSamples'.print_r($neighbor).'<br>';
                $sqrtValue = 0.0;
                foreach ($current as $c => $val) {
                    $val = (($current[$c] - $neighbor[$c])) ** 2;
                    $sqrtValue += $val;
                }
                $sqrt = sqrt((float)$sqrtValue);
                $minValue[$j] = $sqrt;
                // echo 'sqrt'.$sqrt.'<br>';
            }
            $key = array_keys($minValue ,min($minValue))[0];
            $this->cluster[$key][] = $current;
            // echo 'nilai min:'.min($minValue).'<br><br>';
        }
    }
    // private function assignCluster() {
    //     foreach ($this->countSamples as $i => $current) {
    //         $minValue = [];
    //         echo 'countSamples'.print_r($current).'<br>';
    //         foreach ($this->randomSamples as $j => $neighbor) {
    //             echo 'randomSamples'.print_r($neighbor).'<br>';
    //             $val = (($current[0] - $neighbor[0])) ** 2 + (($current[1] - $neighbor[1])) ** 2;
    //             $sqrt = sqrt((float)$val);
    //             echo $current[0]."-".$neighbor[0]."**2"."+".$current[1]."-".$neighbor[1]."**2 sqrt"."=".$sqrt."<br>";
    //             $minValue[$j] = $sqrt;
    //             echo print_r($minValue).'<br>';
    //         }
    //         echo min($minValue).'<br>';
    //     }
    // }
    // public function KmeansDistances() {
    //     $distances = [];
    //     $length = count($this->samples, COUNT_NORMAL) - 1;
    //     // create cluster
    //     for ($x = 0; $x <= $this->k - 1; $x++) {
    //          $this->cluster[$x] = [];
    //     }
    //     // create random sample
    //     for ($x = 0; $x <= $this->k - 1; $x++) {
    //         $randomNumber = mt_rand(0, $length);
    //         $this->randomSamples[$x] = $this->samples[$randomNumber];
    //         for ($j=0; $j<$x; $j++) {
    //             while ( $this->randomSamples[$j] ==  $this->randomSamples[$x]){
    //                $randomNumber = mt_rand(0, $length);
    //                $this->randomSamples[$x] = $this->samples[$randomNumber];
    //                $j = 0;
    //             }
    //         }
    //     }
    //     for ($x = 0; $x < $length; $x++) {
    //         // create flag as sign
    //         $skip = false;
    //         for ($j=0; $j <= $this->k - 1; $j++) {
    //             if($this->samples[$x] == $this->randomSamples[$j]) {
    //                 // if sample equal to randomSample that means the flag is false
    //                $skip = true;
    //                break;
    //             }
    //         }
    //         // if the flage is true then the outer loop must skip the loop
    //         if ($skip) {
    //             continue;
    //         }
    //         $this->countSamples[$x] = $this->samples[$x];
    //     }
    //     echo $this->assignCluster();
    // }
}
