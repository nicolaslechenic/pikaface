<?php

require_once('./src/Pokemon.php');

beforeEach(function() {
    Pokemon::clean();
});


// TDD => Test Driven Development
// RED => GREEN => REFACTO

it("should return hello", function () {
    // Arrange
    $data = ['nickname' => 'Pikachu', 'password' => 'pikapika'];
    $pokemon = new Pokemon($data);

    // Act
    $message = $pokemon->hello();

    // Assert
    assert($message === 'Hello');
});


describe('->isConnected()', function () {
    it("should return false with invalid password", function () {
        // Arrange
        $data = ['nickname' => 'Pikachu', 'password' => 'pikapik'];
        $pokemon = new Pokemon($data);
    
        // Act
        $isConnected = $pokemon->isConnected();
    
        // Assert
        assert($isConnected === false, 'expected false');
    });
    
    it("should return false with invalid nickname", function () {
        // Arrange
        $data = ['nickname' => 'Pikach', 'password' => 'pikapika'];
        $pokemon = new Pokemon($data);
    
        // Act
        $isConnected = $pokemon->isConnected();
    
        // Assert
        assert($isConnected === false, 'expected false');
    });
    
    
    it("should return true with valid password", function () {
        // Arrange
        $data = ['nickname' => 'Pikachu', 'password' => 'pikapika'];
        $pokemon = new Pokemon($data);
    
        // Act
        $isConnected = $pokemon->isConnected();
    
        // Assert
        assert($isConnected === true, 'expected true');
    });
});

describe('->all()', function() {
    it("count empty array of Pokemons", function () {
        // Assert
        assert(count(Pokemon::all()) === 0);
    });
});

describe('->save()', function() {
    it("return saved Pokemon", function () {
        // Arrange
        $data = ['nickname' => 'Pikachu', 'password' => 'pikapika'];
        $pokemon = new Pokemon($data);
    
        // Act
        $pokemon->save();

        // Assert
        assert(count(Pokemon::all()) === 1);
    });
});



