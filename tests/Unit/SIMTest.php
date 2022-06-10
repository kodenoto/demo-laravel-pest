<?php

use App\Lib\SIM;

test('invalid usia antara 1 - 16 tahun', function () {
    $sim = new SIM();

    for ($umur = 1; $umur <= 16; $umur++) {
        expect($sim->isValidAge($umur))->toBe(false);
    }
});

test('valid jika range antara 17 - 50 tahun', function () {
    $sim = new SIM();

    for ($umur = 17; $umur <= 50; $umur++) {
        expect($sim->isValidAge($umur))->toBe(true);
    }
});

test('invalid jika lebih dari 50 tahun', function () {
    $sim = new SIM();

    for ($umur = 51; $umur <= 120; $umur++) {
        expect($sim->isValidAge($umur))->toBe(false);
    }
});

test('invalid jika input number kurang dari 1', function () {
    $sim = new SIM();

    expect(fn () => $sim->isValidAge(-1))
        ->toThrow(Exception::class, "Number must be greather than 0");
});

test('invalid jika input adalah string huruf', function () {
    $sim = new SIM();

    expect(fn () => $sim->isValidAge("ABC"))
        ->toThrow(Exception::class, "Please input only number");
});

test('invalid jika input adalah string angka', function () {
    $sim = new SIM();

    expect(fn () => $sim->isValidAge("12"))
        ->toThrow(Exception::class, "Please input only number");
});

test('invalid jika input adalah array', function () {
    $sim = new SIM();

    expect(fn () => $sim->isValidAge([]))
        ->toThrow(Exception::class, "Please input only number");
});
