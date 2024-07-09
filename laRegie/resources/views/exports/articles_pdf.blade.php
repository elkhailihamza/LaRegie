<style>
    * {
        box-sizing: border-box;
    }

    .container {
        padding: 20px;
    }

    .body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        margin: 0;
    }

    .body__header {
        padding: 0.5em;
    }

    .body__header__img {
        width: 100px;
        height: auto;
        margin-right: 10px
    }

    .body__header__div {
        clear: both;
        float: right;
        padding: 1em 0;
    }

    .body__header__div__span {
        display: block;
        margin-bottom: 2.5px;
        font-size: 1em;
    }

    .body__main {
        border: 2px solid gray;
    }


    .body__main__h2--title {
        text-align: center;
        padding: 0px 2em;
        text-decoration: underline;
    }

    .body__main__div--description {
        padding: 5px 2em;
    }

    .body__main__div--description__p {
        padding: 0px 1.75em;
        overflow-wrap: break-word;
    }

    .body__footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 1.75em 0;
    }

    .body__footer__span {
        font-size: 0.85em;
    }
</style>

<Body class="body container">
    <header class="body__header">
        <img class="body__header__img" src="{{public_path('storage/larad.png')}}" alt="laRadeemaLogo.png">
        <div class="body__header__div">
            <span class="body__header__div__span">
                Date d'aujourd'hui: {{date("Y/m/d")}}
            </span>
            <span class="body__header__div__span">
                Date creation: {{ $article->created_at->locale('fr')->diffForHumans() }}
            </span>
            <span class="body__header__div__span">
                Métier: {{$article->segment->famille->groupe->metier->metier_nom}}
            </span>
            <span class="body__header__div__span">
                Segment: {{$article->segment->libelle}}
            </span>
            <span class="body__header__div__span">
                Id: {{$article->id}}
            </span>
        </div>
        <hr style="margin: 2em 0px;">
    </header>
    <main class="body__main container">
        <h2 class="body__main__h2--title">{{ucfirst($article->article_nom)}}</h2>
        <div class="body__main__div--description" style="padding: 5px 25px;">
            <h4>Description:</h4>
            <p class="body__main__div--description__p">{{$article->description}}</p>
        </div>
    </main>
    <Footer class="body__footer">
        <hr>
        <span class="body__footer__span">
            © Tous droits réservés Radeema 2024
        </span>
    </Footer>
</Body>