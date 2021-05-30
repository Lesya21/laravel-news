<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Новостной сайт</strong>
            </a>
            <div id="header-form">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Есть вопросы?
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <transition name="fade">
                                <div class="modal-header alert alert-success" v-if="success">
                                    Отправлено!
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </transition>
                            <div class="modal-header" v-if="!success">
                                <h4>Задать вопрос</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" v-if="!success">
                                <form method="POST" action="{{ route('forms.callback')  }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" type="text" name="name" v-model="name" placeholder="Имя"/>
                                    </div>
                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control" type="text" v-model="comment" placeholder="Вопрос"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary" type="submit" @click.prevent="send('{{ route('forms.callback') }}')">Отправить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ mix('js/header-form.js') }}"></script>
        </div>
    </div>
</header>
