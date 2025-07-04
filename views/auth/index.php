<main class="grid place-content-center min-h-screen -my-12">
    <section class="border-neutral-400 border rounded-md p-4 space-y-5" >
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">
                <?= $action == "login" ? "Inicia Sesión" : "Regístrate" ?>
            </h2>
            <span class=" text-neutral-500" >Ingresa tus datos para acceder</span>
        </div>
        <form
            action="index.php?action=<?= $action ?>"
            method="post"
            class="flex flex-col gap-4"
        >
            <?php if ($action == "signup"): ?>
                <label class="space-y-2" for="usuario_nombre">
                    <span class="font-semibold">Nombre</span>
                    <input
                        type="text"
                        placeholder="Ingresa tu nombre"
                        class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                        name="usuario_nombre"
                        id="usuario_nombre"
                    >
                </label>
            <?php endif; ?>
            <label class="space-y-2" for="usuario_correo">
                <span class="font-semibold">Correo</span>
                <input
                    type="email"
                    placeholder="Ingresa tu correo"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="usuario_correo"
                    id="usuario_correo"
                >
            </label>
            <label class="space-y-2" for="usuario_password">
                <span class="font-semibold">Contraseña</span>
                <input
                    type="password"
                    placeholder="Ingresa tu contraseña"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="usuario_password"
                    id="usuario_password"
                >
            </label>
            <button
                class="bg-black rounded-md text-white
                px-4 py-2 font-bold hover:opacity-75 transition-opacity"
                type="submit"
            >
                Entrar
            </button>
            <a
                href="index.php?action=<?= $action == "login"
                    ? "signup"
                    : "login" ?>"
               class="text-right underline underline-offset-2
               text-blue-600 font-semibold text-sm"
            >
                <?= $action != "login" ? "Inicia Sesión" : "Regístrate" ?>
            </a>
        </form>
    </section>
</main>
