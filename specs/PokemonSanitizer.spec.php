<?php

require_once('./src/PokemonSanitizer.php');

describe('->call()', function() {
  it("should return same data for valid input", function () {
    $data = ['nickname' => 'Pseudo', 'password' => 'validPass'];
    $sanitizer = new PokemonSanitizer($data);

    $data = $sanitizer->call();

    assert($data == ['nickname' => 'Pseudo', 'password' => 'validPass'], 'Expected data');
  });

  it("should return sanitized data for xss injection (nickname)", function () {
    $data = ['nickname' => '<script>alert("Hello");</script>', 'password' => 'validPass'];
    $sanitizer = new PokemonSanitizer($data);

    $data = $sanitizer->call();

    assert($data == ['nickname' => '&lt;script&gt;alert(&quot;Hello&quot;);&lt;/script&gt;', 'password' => 'validPass'], 'Expected data');
  });
});

