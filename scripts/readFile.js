  const fs = require('fs');

  fs.readFile('/data/output.txt', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      return;
    }

    if (data.trim() === 'TestMessage') {
      console.log('found');
    } else {
      console.log('Text not found');
    }
  });