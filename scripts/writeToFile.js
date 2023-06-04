const fs = require('fs');

const content = 'ReloadBrowser';

fs.writeFile('data/output.txt', content, (err) => {
  if (err) {
    console.error(err);
    return;
  }
  console.log('Content has been written to output.txt');
});
