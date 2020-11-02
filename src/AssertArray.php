<?php

/**
 * Created by Zoran Jankovic.
 * User: zjkiza
 * Date: 9/01/20
 */

namespace ZJKiza\Testing;

use PHPUnit\Framework\Assert as PHPUnitAssert;

trait AssertArray
{
    public function assertArraySubsetSame(array $expect, array $actual): void
    {
        PHPUnitAssert::assertSame(
            $this->processingArray($expect, $actual),
            $expect,
            'An array does not contain a subset of another array');
    }

    public function assertArraySubsetEqual(array $expect, array $actual): void
    {
        PHPUnitAssert::assertEquals(
            $this->processingArray($expect, $actual),
            $expect,
            'An array does not contain a subset of another array');
    }

    public function assertArrayEqualsKeys(array $expect, array $actual): void
    {
        PHPUnitAssert::assertCount(
            0,
            array_diff_key($expect, $actual),
            'Some fields are missing in the output'
        );
    }

    public function assertArrayFragmentSame(array $expect, array $actual, string $columnName, string $needle): void
    {
        $catExpect = $this->search($expect, $columnName, $needle);

        PHPUnitAssert::assertSame(
            $this->processingArray($catExpect, $actual),
            $catExpect,
            'An array does not contain a subset of another array');
    }

    private function processingArray(array $expect, array $actual): array
    {
        return array_replace_recursive($expect, $actual);
    }

    private function search(array $expect, string $columnName, string $needle): array
    {
        $key = array_search($needle, $this->getColumn($expect, $columnName), true);

        return $key === false ? [] : $expect[$key];
    }

    private function getColumn(array $expect, string $columnName): array
    {
        return array_column($expect, $columnName);
    }
}
