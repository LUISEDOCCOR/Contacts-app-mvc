<?php
$imagen_perfil =
    "https://ui-avatars.com/api/?background=random&name=" .
    $_SESSION["usuario_nombre"]; ?>

<header class="mb-10 flex items-center justify-between">
    <h1 class="text-2xl font-bold">
        <i class="fa-solid fa-address-book"></i>
        App Contactos
    </h1>
    <ul
        class="flex gap-2 text-neutral-500 font-semibold flex-col
        items-end xl:items-center xl:flex-row"
    >
        <li>
            <?= $_SESSION["usuario_correo"] ?>
        </li>
        <li>
            <img
                src="<?= $imagen_perfil ?>"
                alt="imagen-perfil"
                class="rounded-full w-8 border border-neutral-400"
            >
        </li>
        <li>
            <a
                href="index.php?action=logout"
                class="underline underline-offset-2 hover:text-red-500 transition-colors"
            >
                Cerrar sesión
            </a>
        </li>
    </ul>
</header>
<main class="space-y-8">
    <section class="border-neutral-400 border rounded-md p-4 space-y-5" >
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Añadir Contacto</h2>
            <span class=" text-neutral-500" >Ingresa el nombre y número del nuevo contacto</span>
        </div>
        <form action="index.php?action=crear" method="post" class="grid gap-4 grid-cols-1 xl:grid-cols-2">
            <label class="space-y-2" for="nombre_contacto">
                <span class="font-semibold">Nombre</span>
                <input
                    type="text"
                    placeholder="Ingresa el nombre"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="nombre_contacto"
                    id="nombre_contacto"
                >
            </label>
            <label class="space-y-2" for="numero_contacto">
                <span class="font-semibold">Número</span>
                <input
                    type="tel"
                    placeholder="Ingresa el número"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="numero_contacto"
                    id="numero_contacto"
                >
            </label>
            <button
                class="bg-black rounded-md text-white
                px-4 py-2 font-bold hover:opacity-75 transition-opacity
                col-span-1 xl:col-span-2"
                type="submit"
            >
                Agregar
            </button>
        </form>
    </section>
    <section class="border-neutral-400 border rounded-md p-4 space-y-5">
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Lista de Contactos</h2>
            <span class=" text-neutral-500" >Estos son todos tus contactos</span>
        </div>
        <div class="flex flex-col gap-4 max-h-[30vh] overflow-hidden overflow-y-auto">
            <!-- card -->
           <?php foreach ($contactos as $contacto): ?>
                <div
                    class="border-neutral-400 border rounded-md p-3
                    flex flex-col items-start gap-4 xl:items-center xl:flex-row
                    xl:justify-between"
                >
                    <div>
                        <span class="text-lg font-semibold block">
                            <?= $contacto["nombre"] ?>
                        </span>
                        <span class="text-neutral-700" >
                            <?= $contacto["numero"] ?>
                        </span>
                    </div>
                    <div class="flex gap-2 w-full justify-end xl:justify-center xl:w-auto">
                        <a
                            href="index.php?action=borrar&id=<?= $contacto[
                                "id"
                            ] ?>"
                            class="bg-red-400 aspect-square flex justify-center
                            items-center rounded-md hover:opacity-75 transition-opacity w-9
                            text-lg xl:text-xl xl:w-12"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a
                            href="index.php?action=editar&id=<?= $contacto[
                                "id"
                            ] ?>"
                            class="bg-yellow-400 aspect-square flex justify-center
                            items-center rounded-md hover:opacity-75 transition-opacity w-9
                            text-lg xl:text-xl xl:w-12"
                        >
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
