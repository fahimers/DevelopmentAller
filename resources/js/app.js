

const express = require('express');
const app = express();




const articles = [

    { id:"586678522fe37e66355fcbd0", title: 'Article title 1', content: 'Lorem ipsum'},
    { id:'586678522fe37e66355fcbd2', title: 'Article title 2', content: 'Ipsum lorem'}
];

app.get('/api/articles',(req, res) => {
    res.send([articles]);
});

app.get('/api/articles/:id', (req, res) => {
    const article = articles.find(c => c.id === (req.params.id));

    if(!article) res.status(404).send('The article with the given ID was not found');
    res.send(article);
});
//läser environment variable annars ta port 3000
const port = process.env.PORT || 3000;

app.listen(port,() => console.log(`Listening on port ${port}...`));
