import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { UserAuthModule } from './user-auth/user-auth.module';
import { LoginComponent } from './user-auth/login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
   LoginComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    UserAuthModule,
    LoginComponent,
 
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
