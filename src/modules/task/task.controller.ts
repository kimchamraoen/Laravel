/* eslint-disable prettier/prettier */
 
 
import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
} from '@nestjs/common';
import { TaskService } from './task.service';
import { User } from '../user/user.entity';

@Controller('tasks')
export class TaskController {
  constructor(private readonly taskService: TaskService) {}

  @Post()
  async createTask(@Body() body: unknown) {
    const typedBody = body as {
      user: User;
      name: string;
      description?: string;
      completedAt?: string | null;
    };

    const user = typedBody.user;
    const taskData = {
      name: typedBody.name,
      description: typedBody.description,
      completedAt: typedBody.completedAt
        ? new Date(typedBody.completedAt)
        : undefined,
    };

    return await this.taskService.createTask(taskData, user);
  }

  @Get()
  getAllTasks() {
    return this.taskService.getAllTasks();
  }

  @Get('/:id')
  getTask(@Param('id') id: string) {
    return this.taskService.getTask(Number(id));
  }

  @Patch('/:id')
  updateTask(@Param('id') id: string, @Body() body: any) {
    // eslint-disable-next-line @typescript-eslint/no-unsafe-argument
    return this.taskService.updateTask(Number(id), body);
  }

  @Delete('/:id')
  deleteTask(@Param('id') id: string) {
    return this.taskService.deleteTask(Number(id));
  }
}