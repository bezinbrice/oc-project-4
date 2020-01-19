<?php $titleSite = 'Contact'; ?>
<?php ob_start(); ?>

    <div class="banner-contactView jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4 banner-authorView--text">PAGE CONTACT</h1>
                    <h2 class="my-4 banner-authorView--text">UNE QUESTION ? N'HESITEZ PAS.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form action="index.php?action=contactView" method="post" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Votre email" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mesSubject">Sujet</label>
                                    <select id="mesSubject" name="mesSubject" class="form-control" required="required">
                                        <option value="na" selected="">Choisir parmis la liste :</option>
                                        <option value="Le livre 'Billet simple pour l'Alaska'">Le livre "Billet simple pour l'Alaska"</option>
                                        <option value="Le site web">Le site web</option>
                                        <option value="L'auteur">L'auteur</option>
                                        <option value="La maison d'édition">La maison d'édition</option>
                                        <option value="Divers">Divers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contentMessage">Message</label>
                                    <textarea name="contentMessage" id="message-contact" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-info pull-right" id="btnContactUs">Envoyer Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Notre adresse</legend>
                    <address>
                        <strong>Valerian's Books</strong><br>
                        79 rue de la perche<br>
                        Paris, 75002<br>
                        <abbr title="Téléphone">
                            T:</abbr>
                        01 80 74 54 08
                    </address>
                    <address>
                        <strong>Valerian's Books Email</strong><br>
                        <a href="mailto:bezinbrice@gmail.com">valerians.book@contact.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($_SESSION['msg'])): ?>
        <div id="message">
            <?php
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>