import { createApp } from "vue";

import QuoteList from "./components/ListQuote.vue";
import RandomQuote from "./components/RandomQuote.vue";
import FindQuote from "./components/FindQuote.vue";

const app = createApp({});
app.component("quotes", QuoteList);
app.component("quotes-randomly", RandomQuote);
app.component("quotes-search", FindQuote);
app.mount("#app");