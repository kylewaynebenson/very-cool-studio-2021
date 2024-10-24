// Function to extract the character set from the font
function getCharacterSet(font) {
	var characters = [];
	var glyphIndex, glyph;

	for (glyphIndex = 0; glyphIndex < font.numGlyphs; glyphIndex++) {
		glyph = font.glyphs.get(glyphIndex);

		if (glyph.unicode !== undefined) {
		characters.push(String.fromCharCode(glyph.unicode));
		}
	}

	return characters;
}

function showEnlargedCharacter(character, characterName, unicodePoint) {
	var characterContainer = document.getElementById('enlarged-character-container');
	var characterSpan = document.getElementById('enlarged-character');
	var nameSpan = document.getElementById('enlarged-character-name');
	var unicodeSpan = document.getElementById('enlarged-unicode-point');
  
	characterSpan.textContent = character;
	nameSpan.textContent = characterName;
	unicodeSpan.textContent = 'U+' + unicodePoint.toString(16).toUpperCase().padStart(4, '0');
  }