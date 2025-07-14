<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>

    <Head>
        <meta head-key="description" name="description" content="default description">
        <title>Placeholder</title>
    </Head>

    <body>
        <header>
            <Link href="#" title=""><img src="" alt=""></Link>
            <nav>
                <ul>
                    <li>
                        <Link href="/" title="">FAQ</Link>
                    </li>
                    <li>
                        <Link href="/tags" title="">Tags</Link>
                    </li>
                    <li>
                        <Link href="#" title="">Login</Link>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <slot />
        </main>
        <footer>
            <span>Footer</span>
        </footer>
    </body>

</template>