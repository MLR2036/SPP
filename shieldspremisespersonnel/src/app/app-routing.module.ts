import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DashboardComponent } from '../app/components/dashboard/dashboard.component';
import { AboutusComponent } from '../app/components/aboutus/aboutus.component';
import { ContactusComponent } from '../app/components/contactus/contactus.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'components/dashboard' },
  { path: 'components/dashboard', component: DashboardComponent },
  { path: 'components/aboutus', component: AboutusComponent },
  { path: 'components/contactus', component: ContactusComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
